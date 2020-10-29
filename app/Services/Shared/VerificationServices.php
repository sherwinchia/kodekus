<?php

namespace App\Services\Shared;

use App\Models\User;
use App\Models\VerificationToken;

use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationServices
{
	public function generateToken(User $user, $type){
		$this->revokeUnusedTokens($user, $type);

		return VerificationToken::create([
			'user_id' => $user->id,
			'token' => $this->generateUniqueToken($type),
			'expire_at' => Carbon::now()->addHours(24),
			'type' => $type,
		]);
	}
  
  private function generateUniqueToken($type){
    return md5($type . ' verification' . time() . 'token');
  }

	private function revokeUnusedTokens(User $user, $type){
		VerificationToken::where('user_id', $user->id)->where('type', $type)->where('validated_at', null)->delete();
	}

	public function isValidToken($token, $type){
		$token = VerificationToken::where('token', $token)->where('type', $type)->where('validated_at', null)->first();

		if ($token && $token->expire_at > Carbon::now()) {
			return $token;
		}

		return null;
	}

	public function revokeToken(VerificationToken $token){
		$token->validated_at = Carbon::now();
		$token->save();
	}
}
