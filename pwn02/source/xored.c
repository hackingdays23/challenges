#include <stdio.h>
#include <string.h>

int main() {
	
	unsigned char secret[100] = "Xw]PVJEYTnPCEn^WnBE^CHL";
    	unsigned char key[100] = "1";
	size_t secretlen = strlen(secret);
	size_t keylen = strlen(key);
	unsigned char crypt[secretlen];
	unsigned char decrypt[100];
	unsigned char crypt[secretlen];


	for(int i = 0; i < secretlen; i++){

		crypt[i] = secret[i] ^ key[i % keylen];
   		//printf("%s", crypt);

		
		decrypt[i] = secret[i] ^ key[i % keylen];
		//printf("%s", decrypt);
	}


	printf("%s\n", crypt);

	//printf("%s\n", decrypt);




}
