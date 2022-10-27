import java.io.IOException;
import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class AddServlet
 */
@WebServlet("/processRequest")
public class processRequest extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public processRequest() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try
		{
	
		//getting input values from jsp page
			int ID =Integer.parseInt(request.getParameter("id"));
			int recipientID =Integer.parseInt(request.getParameter("recipientID"));
			Date date = Date.valueOf(request.getParameter("date"));
			
		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/bloodbank"; //MySQL URL and followed by the database name
 		String username = "bbmsuser"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con);
 		
 		PreparedStatement st1 = con.prepareStatement("select * from `BloodStock` where id = ? and isRecieved = 0");
 		st1.setInt(1, ID);
 		ResultSet rs = st1.executeQuery();
 		
 		int count = 0;
 		int donortypeID = -1;
 		while(rs.next()) {
 			donortypeID = rs.getInt("typeID");
 			count += 1;
 		}
 		if(count == 0) {
 			System.out.println("Stage 1");
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
 			rd.forward(request, response);
 			return;
 		}
 		
 		PreparedStatement st2 = con.prepareStatement("select * from `Recipient` where recipientID = ?");
 		st2.setInt(1, recipientID);
 		rs = st2.executeQuery();
 		
 		count = 0;
 		int recipienttypeID = -1;
 		while(rs.next()) {
 			recipienttypeID = rs.getInt("typeID");
 			count += 1;
 		}
 		if(count == 0) {
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
 			rd.forward(request, response);
 			return;
 		}
 		
 		Statement stmt = con.createStatement();
 		rs = stmt.executeQuery("select * from canDonate");
 		
 		int arr[][] = new int[8][8];
		for(int i = 0; i<8; i++)
		{
			for(int j = 0; j<8; j++)
			{
				arr[i][j]=0;
			}
		}
		
		while(rs.next())
		{
			int typeIDDonor = rs.getInt("typeIDDonor");
			int typeIDRecipient = rs.getInt("typeIDRecipient");
			arr[typeIDRecipient-1][typeIDDonor-1] = 1;
		}
		for(int i = 0; i < 8; i++)
		{
			for(int j = 0; j < 8; j++)
			{
				System.out.print(arr[i][j]+" ");
			}
			System.out.print("\n");
		}
		
		System.out.println(recipientID);
		System.out.println(ID);
		if(arr[recipienttypeID -1][donortypeID - 1] == 0) {
			System.out.println("Stage 3");
			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
 			rd.forward(request, response);
 			return;
		}
		
 		PreparedStatement st3 = con.prepareStatement("INSERT INTO `recieves`(`id`, `recipientID`, `dateRecieved`) VALUES (?,?,?)");
 		st3.setInt(1, ID);
 		st3.setInt(2, recipientID);
 		st3.setDate(3, date);
 		
 		boolean Stage1 = false;
 		int updateResult = st3.executeUpdate();
 		if(updateResult > 0) {
 			Stage1 = true;
 		}
 		else {
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
 			rd.forward(request, response);
 			return;
 		}
 		
 		if(!Stage1) {
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
 			rd.forward(request, response);
 			return;
 		}
 		
 		PreparedStatement st4 = con.prepareStatement("UPDATE `BloodStock` SET `isRecieved` = 1 WHERE `BloodStock`.`id` = ?");
 		st4.setInt(1, ID);

 		updateResult = st4.executeUpdate();
 		if(updateResult > 0) {
 			String result = "Success";
			request.setAttribute("result", result);
			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
			rd.forward(request, response);
			return;
 		}
 		
 		}
		 catch (Exception e) 
 		{		
			 	e.printStackTrace();
			 	System.out.println("Stage 0");
	 			String result = "Fail";
	 			request.setAttribute("result", result);
	 			RequestDispatcher rd = request.getRequestDispatcher("processRequestResult.jsp");
	 			rd.forward(request, response);
	 			return;
 		}

		
	}

}