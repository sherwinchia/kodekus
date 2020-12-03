<?php

namespace App\Http\Controllers\Browser\Auth;

use App\Models\Page;
use SEOTools;
use Illuminate\Http\Request;

use App\Models\VerificationToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Shared\VerificationServices;

class AuthController extends Controller
{
  public const PATH = 'browser.auth.';
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';
  private const TYPE_PASSWORD = 'PASSWORD_RESET';

  protected $sVerification;

  public function __construct()
  {
    $this->sVerification = resolve(VerificationServices::class);
  }

  public function show()
  {
    //0 = Title, 1 = Description, 2 = Twitter Site
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Login &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);
    SEOTools::setCanonical(route('browser.auth.show'));

    SEOTools::opengraph()->setUrl(route('browser.auth.show'));
    SEOTools::opengraph()->addProperty('type', 'articles');
    
    SEOTools::twitter()->setSite($metas[2]['content']);
    SEOTools::twitter()->setUrl(route('browser.auth.show'));

    SEOTools::jsonLd()->setType('Article');
    

    if (request()->has('type')) {
      $form  = request()->get('type');
      SEOTools::setTitle(ucfirst($form) . ' &middot; ' . config('app.name') );
    } else {
      $form = 'login';
      SEOTools::setTitle('Login &middot; ' . config('app.name') );
    }
    
    return view(self::PATH . 'show', compact('form'));
  }

  public function logout()
  {
    Auth::guard('web')->logout();
	  return redirect()->back();
  }
  
  public function showResetPasswordForm($token)
  {
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Reset Password &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);

    $vToken = $this->sVerification->isValidToken($token, self::TYPE_PASSWORD);
    
    if (!$vToken) {
      return abort(403);
    }

    return view(self::PATH . 'reset-password', ['token' => $vToken]);
  }

  public function activate()
  {
    $metas = Page::where('name', 'Meta')->first();
    $metas = unserialize($metas->content);

    SEOTools::setTitle('Activate Account &middot; ' . config('app.name') );
    SEOTools::setDescription($metas[1]['content']);

    return view(self::PATH . 'activate');
  }

  public function activateAccount($token)
  {
    $vToken = $this->sVerification->isValidToken($token, self::TYPE_EMAIL);

    if (!$vToken) {
      return abort(404);
    }

    $this->sVerification->revokeToken($vToken);

    Auth::login($vToken->user);

    return redirect()->route('browser.home.index')->with(['success' => 'Successfully activated account.']);
  }
}
