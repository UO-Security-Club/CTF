#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char * str = "/bin/sh";

void getDate(char * cmd) {
	system(cmd);
}

void getInput() {
	char buf[64];
	gets(buf);
}

void main() {
	getInput();
	printf("Saved input on:\n");
	getDate("/bin/date");
	return;
}
