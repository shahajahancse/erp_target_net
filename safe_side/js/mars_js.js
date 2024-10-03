function daily_attendance_summary()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select date");
		return;
	}
	
	var category = document.getElementById('category').value;
	if(category =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/mars_con/daily_attendance_summary/"+firstdate+"/"+category;
	
	daily_att_sum = window.open(url,'daily_att_sum',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_att_sum.moveTo(0,0);
}