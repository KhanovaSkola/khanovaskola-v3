Passwords
=========

Passwords are bcrypted via Nette\Security\Passwords and stored in database encrypted with aes.
Production aes key must not be public.

Reset
-----

Logged out users may request password reset via email. Upon entering their email address, they
 recive token that logs them in, marks session as TwoStepVerification and opens password change page.

Change
------

Logged in users may change their password. If the current session is does not have TwoStepVerification set,
the flow is same as with Reset. If 2SV is set (user logged in via email token), password change form is presented.
