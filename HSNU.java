import java.io.*;
import java.util.Arrays;
import java.util.Calendar;

/**author: px@1245
idea credits to 懶懶@1245
*/

class HSNU
{

	/* http://java.ittoolbox.com/groups/technical-functional/java-l/find-index-of-an-array-1772510 */
	public static int getIndex(String[] array, String specificValue){

		for(int i=0; i<array.length; i++){

			if(array[i].equals(specificValue)){

			return i;

			}

		}

		return -1;

	} 


	public static void main(String[] args) throws IOException
	{
		
		String[] classes =
		{
		
		"1316~1342",
		"1289~1315",
		"1262~1288",
		"1235~1261",
		"1208~1234",
		"1181~1207",
		"1154~1180",
		"1127~1153",
		"1100~1126",
		"1073~1099",
		"1046~1072",
		"1018~1045",
		"992~1017",
		"965~991",
		"938~964",
		"911~937",
		"884~910",
		"857~883",
		"830~856",
		"804~829",
		"777~803",
		"750~776",
		"724~749",
		"696~723",
		"670~695",
		"644~669",
		"618~643",
		"592~617",
		"566~591",
		"540~565",
		"514~539",
		"488~513",
		"464~487",
		"441~463",
		"417~440",
		"394~416",
		"372~393",
		"349~371",
		"327~348",
		"307~326",
		"285~306",
		"263~284",
		"243~262",
		"223~242",
		"201~222",
		"181~200",
		"161~180",
		"140~160",
		"121~139",
		"107~120",
		"98~106",
		"89~97",
		"77~88",
		"68~76",
		"62~67",
		"56~61",
		"48~55",
		"44~47",
		"41~43",
		"37~40",
		"32~36",
		"26~31",
		"20~25",
		"14~19",
		"10~13",
		"6~9",
		"3~5",
		"1~2"

		//以後只需要更新這裡↑↑

		};
		
		String lastclass = classes[0];
		
		String[] newest = lastclass.split("~"); //切割最新的班級
		
		int a = getIndex(classes, "1235~1261");	//取得參考班級之索引值	
		
					
		try{
		System.out.println("===附中‧靠班號算年齡之JAVA版===");
		System.out.println("請輸入您的班號：");
		
		BufferedReader br = new BufferedReader (new InputStreamReader(System.in));
		
		String str = br.readLine();
		
		int classnumber = Integer.parseInt(str);
		
		System.out.print("您的班號是" + classnumber);
		
		
		//開始搜尋班號落在哪個區間
		
		String Tmp;
		String[] tmp2;
		int b=-1;
		
		for(int h=0;h < classes.length;h++){
			
			Tmp = classes[h];
			tmp2 = classes[h].split("~");
			int tmp3 = Integer.parseInt(tmp2[1]);
			int tmp4 = Integer.parseInt(tmp2[0]);
			
			if(classnumber <= tmp3 && classnumber >= tmp4){
				b = h;			
			}
		
		}
		
		System.out.println("，落在" + classes[b] + "班這一屆");
		
		
		
		//取得今年年分
		Calendar ThisYear = Calendar.getInstance();
		int ThisYear2 = ThisYear.get(Calendar.YEAR);
		
		//計算參考班級之實際年齡
		int reference_age = ThisYear2 - 1994 + 1;
		
		//計算實際年齡
		int d = b - a;
		int youage = reference_age + d;
		
		System.out.println("所以您的年齡為" + youage);
		
		System.out.println("\n說明：參考班級1235~1261為" + reference_age + "歲，比較所得之結果。");
	
		
		}
		catch(java.lang.NumberFormatException e){
			
			System.out.println("您輸入的不是數字喔~");
		
		}
		catch(java.lang.ArrayIndexOutOfBoundsException oe){
		
			System.out.println("班號超出本程式所能判斷的範圍TAT");
		
		}
		finally{
		
			System.out.println("\n程式設計 by PX@1245 \n IDEA FROM 懶懶@1245 \n ^^");
		
		}
		
		
	}

}