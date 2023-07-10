/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication1;

import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author cyanp
 */
public class PersonIT {

    @Test
    public void testGetName(){
        
        System.out.println("getname");
        Person instance = new Person();
        String expResult = "";
        String result = instance.getName();
        assertEquals(expResult, result);
    }
    
    @Test
    public void testCalcAge(){
        
        System.out.println("Unit Test: testCalcAge()");
        Person instance = new Person();
        assertEquals(16, instance.calcAge(2000));
        assertEquals(17, instance.calcAge(2000));
    }
    public void testSomeMethod() {
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }
    
}
