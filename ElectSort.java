
public class ElectSort {
//ѡ������ÿһ��ѡ����С�������ڿ�ͷ�����ȶ�����ͬ���ź�λ�ã�
	public static void main(String[] args) {
		int a[]={1,5,5,55,23,34,43};
		int minIndex=0,temp=0;//minIndexѰ����С����
		for(int i=0;i<a.length-1;i++){
			minIndex=i;
			for(int j=i+1;j<a.length;j++){
				if(a[j]<a[minIndex]){
					minIndex=j;
				}
			}
			if(minIndex!=i){
				temp=a[i];//tempΪѡ����������λ��
				a[i]=a[minIndex];
				a[minIndex]=temp;
			}
		
			System.out.println(a[i]);//���һ����û�����
			
		}

	}
}
