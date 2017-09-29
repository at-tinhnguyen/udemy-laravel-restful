Hello {{ $user->name }}
You has change email. Please verify your new email using this link:
{{ route('verify', $user->verification_token) }} 
