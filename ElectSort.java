
public class ElectSort {
//选择排序每一次选出最小的数排在开头，不稳定（相同数排后换位置）
	public static void main(String[] args) {
		int a[]={1,5,5,55,23,34,43};
		int minIndex=0,temp=0;//minIndex寻找最小的数
		for(int i=0;i<a.length-1;i++){
			minIndex=i;
			for(int j=i+1;j<a.length;j++){
				if(a[j]<a[minIndex]){
					minIndex=j;
				}
			}
			if(minIndex!=i){
				temp=a[i];//temp为选出来的数换位置
				a[i]=a[minIndex];
				a[minIndex]=temp;
			}
		
			System.out.println(a[i]);//最后一个数没有输出
			
		}

	}
}
