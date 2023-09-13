## Writeup Aris - Web - Easy
The vulnerability in this challenge is a mass assignment a API security issue that appear on OWASP Top 10 API.
There is a implicit field called "role" in signup form, if it is omitted the user will registered with a role user.
To request the flag in route /api/flag is needed an authorization token as admin, so to get these token the attacker have to insert the role field with the value admin, the application will accept any string that contains "admin" (admin, administrator, Admin, ADMIN, Administator).
Owning an admin token, the next step is insert it in authorization header to request /api/flag.

iFlag{D1d_u_3v3r_trY_n3W_p4R4ms!?}