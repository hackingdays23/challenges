#include <stdio.h>
#include <string.h>
#include <stdlib.h>


int main(int argc, char *argv[]){
	
	if (argc < 2){

		printf("[+] Error: Need 1 argument");
		exit(0);

	}
 

	char text[300];
	//char text2[] = "ACERTOU";
	char secret[24] = "Xw]PVJEYTnPCEn^WnBE^CHL";
        char key[2] = "1";
        size_t secretlen = strlen(secret);
        size_t keylen = strlen(key);
	char crypt[secretlen];


        for(int i = 0; i < secretlen; i++){
		
		crypt[i] = secret[i] ^ key[i % keylen];
	
	}



	printf(" __  __    _    ____ _____ _____ ____  _____ _  __\n");
	printf("|  \\/  |  / \\  / ___|_   _| ____|  _ \\| ____| |/ /\n");
	printf("| |\\/| | / _ \\ \\___ \\ | | |  _| | |_) |  _| | ' /\n ");
        printf("| |  | |/ ___ \\ ___) || | | |___|  _ <| |___| . \\\n");
	printf("|_|  |_/_/    \\_\\____/ |_| |_____|_| \\_\\_____|_|\\_\\");


	printf("\n\nI once forgot to put a correct format for things. This caused serious problems. Can you imagine what it is?\n\n");


	strcpy(text,argv[1]);
	printf("\n\nVar Location: %p", crypt);
	printf("\n\nYou wrote: ");
	printf(text);

 	//printf(crypt);

 
}
