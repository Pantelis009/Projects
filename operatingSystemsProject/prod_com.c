/* Required headers for printf(), rand() and sleep() */
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

/* Required headers for POSIX threads and semaphores */
#include <pthread.h>
#include <semaphore.h>

/* Defines the buffer properties */
typedef int buffer_item;
#define BUFFER_SIZE 5

/* Programming history lesson:
 * https://stackoverflow.com/questions/35565740/define-true-false-vs-define-true-1 */
#define TRUE  (1==1)
#define FALSE (!TRUE)

/* Create the buffer */
buffer_item buffer[BUFFER_SIZE];

/* Pointers to the head and tail of the buffer */
buffer_item* head; buffer_item* tail;

/* Declare the semaphores. Remember we will use them so that the 
 * "s_free" semaphore blocks when the buffer is notionally full, and
 * the "s_used" semaphore blocks when it is empty. They could perhaps
 * better be called "unused_slots" and "used_slots". */
sem_t s_free, s_used;

/* Declare the mutex we will use to protect the critical sections */
pthread_mutex_t mutex;

/* insert_item: insert an item into the buffer. Return 0 in all cases */
int insert_item(buffer_item item) {

    /* TODO: wait for a free space in the buffer, then
     *       safely manipulate the buffer to insert "item"
     * 
     *       Print out "Inserted: '<item>' Used: <used_slots> Free: <free_slots>"
     *       when the insertion is complete.
     */ 

     //Wait for a free space in the buffer 
    sem_wait(&s_free);
     //Lock the mutex 
    pthread_mutex_lock(&mutex);
    
    //* Insert the item at the tail
    *tail = item;
    tail++;
    if (tail >= buffer + BUFFER_SIZE)
        tail = buffer;
    
    /* Unlock the mutex */
    pthread_mutex_unlock(&mutex);
    /* Signal that a new item has been added to the buffer */
    sem_post(&s_used);
    
    /* Print out the inserted item and free and used slots */
    int used_slots, free_slots;
    sem_getvalue(&s_used, &used_slots);
    sem_getvalue(&s_free, &free_slots);
    printf("Inserted: '%d' Used: %d Free: %d\n", item, used_slots, free_slots);
    return 0;
}


/* remove_item: remove an item from the buffer and save in *item */
int remove_item(buffer_item *item) {

    /* TODO: wait for an item in the buffer, then safely
     *       manipulate the buffer to remove the item.
     * 
     *       Print out "Removed: '<item>' Used: <used_slots> Free: <free_slots>"
     *       when the removal is complete.
     */
    /* Wait for an item in the buffer */
    sem_wait(&s_used);
    /* Lock the mutex */
    pthread_mutex_lock(&mutex);
    
    /* Remove the item from the head */
    *item = *head;
    head++;
    if (head >= buffer + BUFFER_SIZE)
        head = buffer;
    
    /* Unlock the mutex */
    pthread_mutex_unlock(&mutex);
    /* Signal that a slot has become available in the buffer */
    sem_post(&s_free);
    
    /* Print out the removed item and free and used slots */
    int used_slots, free_slots;
    sem_getvalue(&s_used, &used_slots);
    sem_getvalue(&s_free, &free_slots);
    printf("Removed: '%d' Used: %d Free: %d\n", *item, used_slots, free_slots);
    return 0;
}


/* Producer: a function that will run as an independent thread, producing
 *           items and adding them to the buffer whenever there is some
 *           space in the buffer.
 * 
 *           Relies on insert_item waiting on the semaphore to indicate
 *           that one or more spaces are available to fill.
 */
void *producer(void *param) {
    buffer_item item;
    
    /* This task never stops: */
    while (TRUE) {
        /* Some randomness to the timing of item production */
        sleep(rand()%16);

        /* A random item (an integer between 0 and 100) */
        item = rand()%100;

        /* Insert it: */
        if (insert_item(item))
            fprintf(stderr, "producer: report error condition\n" );
        else {}
        
    }
}

/* Consumer: a function that will run as an independent thread, consuming
 *           items from the buffer whenever there are items to consume.
 * 
 *           Relies on remove_item waiting on the semaphore to indicate
 *           that one or more items is ready to be removed.
 */
void *consumer(void *param) {
    /* A place to keep the removed item */
    buffer_item item;

    /* This task never stops: */
    while (TRUE) {
        /* Some randomness to the timing of item removal */        
        sleep(rand()%16);

        /* Remove it, save it in "item" */
        if(remove_item(&item))
            fprintf(stderr, "consumer: report error condition\n");
        else {}
    }
}

int main(int argc,  char *argv[]) {
    
    /* Check the command-line arguments: */
    if(argc<4) {
        printf("Syntax: prod-com <sleeptime> <producers> <consumers>\n");
        exit(0);
    }
    
    /* Local variables for main() to use: */
    int sleeptime, numP, numC;
    int numcreated=0;

    /* 1. get command line arguments */
    sleeptime=atoi(argv[1]); numP=atoi(argv[2]); numC=atoi(argv[3]);
    pthread_t threads[numP+numC];
    printf("Producers: %d  Consumers: %d  Will sleep for: %ds\n", numP, numC, sleeptime);

    /* 2. initialise buffer */
    for(int c=0; c<BUFFER_SIZE; c++) buffer[c] = 0;
    head = tail = buffer;

    /* 2a. initialise the mutual-exclusion object mutex  */
    pthread_mutex_init(&mutex,NULL);

    /* 2b. Initialise the free and used semaphores;
     * initialises s_free to BUFFER_SIZE and s_used to 0: */
    sem_init(&s_free, 0, BUFFER_SIZE);
    sem_init(&s_used, 0, 0);

    /* 3. create producer thread(s) */
    for(int c=0; c<numP; c++)
        pthread_create(&threads[++numcreated], NULL, producer, NULL); 

    /* 4. create consumer thread(s) */
    for(int c=0; c<numC; c++)
        pthread_create(&threads[++numcreated], NULL, consumer, NULL);

    /* 5. sleep */
    printf("Main thread sleeping ...\n");
    sleep(sleeptime);
    printf("Main thread done.\n");

    /* 6. exit */
    exit(0);
}
