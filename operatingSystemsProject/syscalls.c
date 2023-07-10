/* This file is for Part 2 of the coursework */

#include <unistd.h>         // for syscall(), open(), etc
#include <sys/syscall.h>    // for the SYS_xxx call codes
#include <fcntl.h>          // for the file modes
#include <stdio.h>          // for printf()

int main(int argc, char** argv) {
    const char* ifname = "input.txt";
    const char* ofname = "output.txt";
    
    if (argc < 2) {
        printf("Usage: %s s|w\n", argv[0]);
        return 1;
    }

    // Todo: if the first parameter is 's':
    // your code here
    
        /** Todo: use the syscall() function to copy 256 bytes
         *  of input.txt to output.txt
         */

        

    if (argv[1][0] == 's') {
        // Use syscall() to copy 256 bytes of input.txt to output.txt
        int fdin = syscall(SYS_open, ifname, O_RDONLY);
        if (fdin < 0) {
            perror("open input.txt");
            return 1;
        }

        int fdout = syscall(SYS_open, ofname, O_CREAT | O_WRONLY | O_TRUNC, S_IRUSR | S_IWUSR);
        if (fdout < 0) {
            perror("open output.txt");
            syscall(SYS_close, fdin);
            return 1;
        }

        char buf[256];
        ssize_t nread = syscall(SYS_read, fdin, buf, sizeof(buf));
        if (nread < 0) {
            perror("read input.txt");
            syscall(SYS_close, fdin);
            syscall(SYS_close, fdout);
            return 1;
        }

        ssize_t nwritten = syscall(SYS_write, fdout, buf, nread);
        if (nwritten < 0) {
            perror("write output.txt");
            syscall(SYS_close, fdin);
            syscall(SYS_close, fdout);
            return 1;
        }

        syscall(SYS_close, fdin);
        syscall(SYS_close, fdout);
    
    
    // Todo: else the first parameter is 'w':
    // your code here
    
        /** Todo: use the wrapper functions to copy 256 bytes
         *  of input.txt to output.txt
         */

        }else if (argv[1][0] == 'w') {
        /*Use the wrapper functions to copy 256 
        bytes of input.txt to output.txt*/
        
        int fdin = open(ifname, O_RDONLY);
        if (fdin < 0) {
            perror("open input.txt");
            return 1;
        }

        int fdout = open(ofname, O_CREAT | O_WRONLY | O_TRUNC, S_IRUSR | S_IWUSR);
        if (fdout < 0) {
            perror("open output.txt");
            close(fdin);
            return 1;
        }

        char buf[256];
        ssize_t nread = read(fdin, buf, sizeof(buf));
        if (nread < 0) {
            perror("read input.txt");
            close(fdin);
            close(fdout);
            return 1;
        }

        ssize_t nwritten = write(fdout, buf, nread);
        if (nwritten < 0) {
            perror("write output.txt");
            close(fdin);
            close(fdout);
            return 1;
        }

        close(fdin);
        close(fdout);
    }
    else {
        printf("Usage: %s s|w\n", argv[0]);
        return 1;
    }
    



    
    

    return 0;
}
