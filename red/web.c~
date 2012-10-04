#include "csapp.h"

int main(int argc, char const *argv[])
{
	char *buf ,*p;
	char arg1[100],arg2[100],arg3[100];
	int n1= 0,n2 = 0;

	if ((buf = getenv("QUERY_STRING")) != NULL)
	{
		p = strchr(buf,'&');
		*p = '\0';
		strcpy(arg1,buf);
		strcpy(arg2,p+1);
		n1 = atoi(arg1);
		n2 = atoi(arg2);
	}

	sprintf(content,"hello,this is my web server!</br>");
	sprintf(content,"%d + %d = %d", n1,n2,n1+n1);
	sprintf(content,"thank you!</br>");

	printf("Content-length:%d\r\n", (int)strlen(content));
	printf("Content-type:text/html\r\n\r\n");
	printf("%s",content);
	fflush(stdout);
	return 0;
}
