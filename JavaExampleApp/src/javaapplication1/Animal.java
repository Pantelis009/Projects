/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication1;

/**
 *
 * @author cyanp
 */
import java.util.Scanner;
import java.util.*;
import sun.applet.Main;
public class Animal {
    
    public static final double FAVNUMBER = 1.6180;
    
    private String name;
    private int weight;
    private boolean HasOwner = false;
    private byte age;
    private long UniqueID;
    private char FavoriteChar;
    private double speed;
    private float height;
    
    protected static int NumberOfAnimals = 0;
    
    
    static Scanner UserInput = new Scanner(System.in);

    public Animal() {
        
       NumberOfAnimals++;
       
       int SumOFNumbers = 5 + 1;       
       System.out.println("5 + 1 = " + SumOFNumbers);
       
       int SubOFNumbers = 5 - 1;       
       System.out.println("5 - 1 = " + SubOFNumbers);
       
       int MultOFNumbers = 5 * 1;       
       System.out.println("5 * 1 = " + MultOFNumbers);
       
       int DivOFNumbers = 5 / 1;       
       System.out.println("5 / 1 = " + DivOFNumbers);
       
       int ModOFNumbers = 5 % 3;       
       System.out.println("5 % 3 = " + ModOFNumbers);
       
       
       System.out.println("Enter name: \n");
       
       if(UserInput.hasNextLine()){
           this.setName(UserInput.nextLine());
       }
       
       
       this.setFavoriteChar();
       this.setUniqueId();
       
       
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getWeight() {
        return weight;
    }

    public void setWeight(int weight) {
        this.weight = weight;
    }

    public boolean isHasOwner() {
        return HasOwner;
    }

    public void setHasOwner(boolean HasOwner) {
        this.HasOwner = HasOwner;
    }

    public byte getAge() {
        return age;
    }

    public void setAge(byte age) {
        this.age = age;
    }

    public long getUniqueID() {
        return UniqueID;
    }

    public void setUniqueID(long UniqueID) {
        this.UniqueID = UniqueID;
    }

    public char getFavoriteChar() {
        return FavoriteChar;
    }

    public void setFavoriteChar(char FavoriteChar) {
        this.FavoriteChar = FavoriteChar;
    }

    public double getSpeed() {
        return speed;
    }

    public void setSpeed(double speed) {
        this.speed = speed;
    }

    public float getHeight() {
        return height;
    }

    public void setHeight(float height) {
        this.height = height;
    }
    
    
    
   public static void main(String[] args){
       
       Animal theAnimal = new Animal();
   } 
    
    
    
    
    
    
    
    
    
    
    
}
