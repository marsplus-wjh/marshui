import java.util.Scanner;
public class MaoSca {

	public static void main(String[] args) {
		int[] a=new int[5];
		Scanner input=new Scanner(System.in);
		System.out.println("输入五个数:");
		for(int q=0;q<=a.length;q++){
			a[q]=input.nextInt();
			for(int i=1;i<=a.length-1;i++){
				int temp=0;
				if(a[q]<a[i]){
					temp=a[q];
					a[q]=a[i];
					a[i]=temp;
				}
			}
			System.out.println(a[q]);
		}

	}

}
