/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication1;

import java.util.Calendar;

/**
 *
 * @author cyanp
 */
public class Person {
    String FirstName ="";
    
    public String getName(){
        return FirstName;
    }
    
    public int calcAge(int BirthYear){
        return (Calendar.getInstance().get(Calendar.YEAR)) - BirthYear;
    }
}
