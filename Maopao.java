
public class Maopao {
//ð������
	public static void main(String[] args) {
		int[] a={5,66,34,56,22,45,78};	
		int i=0,temp=0;
		for(;i<=a.length;i++){
			for(int j=i+1;j<=a.length-1;j++){
				if(a[i]>a[j]){
					temp=a[i];
					a[i]=a[j];
					a[j]=temp;
				}
			}
		}
		//�������Ҫ���鳤��-1
		for(int t=0;t<=a.length-1;t++){
				System.out.println(a[t]);
			}
		}
		

	}


