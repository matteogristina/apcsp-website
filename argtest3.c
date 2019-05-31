#include <stdio.h>
#include <math.h>

float areaOfCircle(float radius) 
{
  float area = (M_PI * radius * radius);
  return area;
}

//
// Simple program which requires two integer inputs on the command line 
//
int main(int argc, char* argv[])
{
  // first check to see if two args (3 including program name) were entered 
  if (argc != 3)
  {
    printf("%s : expected 2 args, please enter two integers\n", argv[0]);
    return 1;
  }

  // at this point we know we have two args, let's check that they are ints
 float smaller;
  // ssscanf scans a string for a format - in this case an integer (%f) and returns
  // the number of items found
  int found = sscanf(argv[1], "%f", &smaller);
  if (found != 1)
  {
    printf("first arg is not an integer, enter two ints\n");
    return 1;
  }

  float larger;
  found = sscanf(argv[2], "%f", &larger);
  if (found != 1)
  {
    printf("second arg is not an integer, enter two ints\n");
    return 1;
  }
  for (float radius = smaller; radius <= larger; radius++)
    {
        float solution = areaOfCircle(radius);
        printf("Area of circle when r = %f is approx. %f\n", radius, solution);
    }
}
  
