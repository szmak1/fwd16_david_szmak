//Pages 6 and 7
//draws rectangles based on random height.


int[] randomCounts; //declare array name

void setup() {
  size(640,240);
  randomCounts = new int[20]; //create new array with 20 elements (0 - 19)
}

void draw() {
  background(255);
  
  int index = int(random(randomCounts.length)); //pic a random number between 0 and array length
  randomCounts[index]++; //and increase the count by 1
  
  stroke(0);
  fill(175);
  int w = width/randomCounts.length; //determine the width of the bars based on screen width

  for (int x = 0; x < randomCounts.length; x++) { //for each position...
      //draw a rectangle based on the data in the array.
      //work out start position and height.
      rect(x * w, height - randomCounts[x], w-1, randomCounts[x]);  
      if (randomCounts[x] >= 640) {
        noLoop();
      }
   }
}
