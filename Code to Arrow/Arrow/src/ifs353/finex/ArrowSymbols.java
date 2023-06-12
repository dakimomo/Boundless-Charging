    
package ifs353.finex;

import java.util.ArrayList;
import static javax.swing.JOptionPane.ERROR_MESSAGE;
import static javax.swing.JOptionPane.showMessageDialog;


/**
 *Provides a set of Unicode arrow symbols and attendant services.
 * @author Dakalo Makatu , Nov 22
 */
public class ArrowSymbols {
      
    /**
     * A collection of 14 Unicode arrow chars.
     */
    
      public final ArrayList<Character> arrowChars;
   
    
    /**
     * Constructs an instance of ArrowSymbols.
     */
      public  ArrowSymbols(){
         arrowChars = new ArrayList<>();  //Creates an array of Unicode arrow chars
         arrowChars.add('\u2190');
         arrowChars.add('\u2191');
         arrowChars.add('\u2192');
         arrowChars.add('\u2193');
         arrowChars.add('\u21A4');
         arrowChars.add('\u21A5');
         arrowChars.add('\u21A6');
         arrowChars.add('\u21A7');
         arrowChars.add('\u21E4');
         arrowChars.add('\u21E5');
         arrowChars.add('\u2196');
         arrowChars.add('\u2197');
         arrowChars.add('\u2198');
         arrowChars.add('\u2199');       
     }
      
     
    /**
     * Translates the integers in the arg array to the Unicode symbols in the 
     * ArrowSymbols.arrowChars array, that correspond to the symbols addressed 
     * by the array index values that are the integers.
     * 
     * When the chars are added to the string, the following rules apply.
     * 
     * 
     *<ul>
     *<li>All arg int[] arrays must have the integer 6 as the first value and the 
     *integer 9 as the final value; an array of integers that does not begin 
     *with 6 and end with 9 will therefore result in an IllegalArgumentException.</li>
     * 
     *<li>Chars with indices 0 to 3 are always preceded by a space char in the returned 
     *string i.e., this method inserts the spaces into the returned string of arrows.</li>
     * </ul>
     * 
     * @param codes an array of integer index values for the arrowChars char array
     * @return a string built from the chars referenced by the integers in 
     * the codes array, according to the rules above.
     * @throws java.lang.IllegalArgumentException if the first integer in the 
     * codes array != 6 and/or the last integer in the codes array != 9
     */
      
   public String toArrowsString​(int[] codes){
         
       String arrowsstring = "";  //Creates an empty string
       
        //      
       for(int i = 0; i<codes.length; i++){   //Loops through the array elements
           
         //Gets the string value of the arrow chars from correspondent index value 
         //and store it in the arrowsstring String object
         arrowsstring = arrowsstring + arrowChars.get(codes[i]).toString();  
           
         //Throws an error if the string of integers does not begin with a 6. 
         if(codes[0] != 6){     
           showMessageDialog(null,"IllegalArgumentException\n" + 
                 "Illegal leading or trailing integer code","ERROR!",
                 ERROR_MESSAGE);
            //break;
            throw new IllegalArgumentException("Error");
           
           }
         
         
         //Throws an error if the string of integers does not end with a 9. 
         if(codes[codes.length-1] !=9){
             showMessageDialog(null,"IllegalArgumentException\n" + 
                   "Illegal leading or trailing integer code","ERROR!",
                  ERROR_MESSAGE);
                
                throw new IllegalArgumentException("Error");
                 }
            
          
             
       
         // Inserts a space if an integer in the integer string is one of 0, 1, 2, 3
         if((i >=0) && i<=3) {
             arrowsstring = arrowsstring + " ";
          }
                   
           }
       
         return arrowsstring;  
             }    
      
            
      
     /**
     * Translates the arrow chars in the arg array to the integer codes that 
     * correspond to the indices of the chars in the ArrowSymbols.arrowChars array.
     * 
     *<ul>
     *<li>When the integers are added to the returned string, they are separated
     * by space chars, with no terminal space.</li>
     * 
     *<li>The arrows array must have the char 0x21A6 as the first element and 
     * the char 0x21E5 as the last element; an array that does not begin and 
     * end with these chars will therefore result in an IllegalArgumentException.</li>
     * </ul>
     * 
     * @param arrows an array of arrow char values
     * @return a string built from the integers referenced by the arrow chars 
     * in the arrowChars array, according to the rules above
     * @throws java.lang.IllegalArgumentException - if the first char in the 
     * codes array != 0x21A6 and/or the last integer in the codes array != 0x21E5
     */
   
     public String toIntegersString(char[] arrows){
         
       StringBuilder sb = new StringBuilder(); //creates a new StringBuilder
      
       for(int i = 0; i < arrows.length;i++){
          sb.append(arrowChars.indexOf(arrows[i]));
          sb.append(" ");
         
       }
       //Throws an error if the string of Arrows does not begin with 0x21A6
        if(arrows[0] !=0x21A6){
            showMessageDialog(null,"IllegalArgumentException\n" + 
               "Illegal leading or trailing char.","ERROR!",
               ERROR_MESSAGE);
                   throw new IllegalArgumentException("Error");
       }
       //Throws an error if the string of Arrows does not end with 0x21E5
        if(arrows[arrows.length-1] !=0x21E5){
            showMessageDialog(null,"IllegalArgumentException\n" + 
               "Illegal leading or trailing char.","ERROR!",
                  ERROR_MESSAGE);
         
                throw new IllegalArgumentException("Error");
       }
           
     
     return sb.toString();
}    
      
}
              
             
              
         
            
                
  
            
    
    
   
        
         

            


    
    

