import java.util.Arrays;
public class ArrayTesting {
    public static void main(String[] args) {
        String[] myArray = {"Somebody", "once", "told", "me"};
        String[] newArray = Arrays.copyOf(myArray,myArray.length * 2);
        System.out.println(newArray.length);
    }
}