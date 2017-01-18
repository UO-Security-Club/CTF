#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void printFlag()
{
	FILE * fp;
	char * line = NULL;
	size_t len = 0;
	ssize_t read;
	fp = fopen("flag.txt", "r");
	if(fp == NULL)
		exit(1);

	while ((read = getline(&line, &len, fp)) != -1) {
		printf("%s\n", line);
	}

	fflush(stdout);
	fclose(fp);
	if(line)
		free(line);

	return;
}

void whatsUP(){
	printf("What's up?");
}

void hello(){
	printf("hello\n");
}

void main(){
	int c;

	printf("Menu Options:\nA: hello\nB: what's up\n");

	printf("Enter a menu option:\n");
	fflush(stdout);

	c = fgetc(stdin);

	if(c == 0x41){
		hello();
	} else if(c == 0x42){
		whatsUP();
	} else if(c == 0x44){
		printFlag();
	} else {
		printf("Exiting\n");
	}

	return;
}
