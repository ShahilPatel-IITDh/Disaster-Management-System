import java.io.IOException;
import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class AddServlet
 */
@WebServlet("/IssueServlet")
public class IssueServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public IssueServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {	//post method is being used as it is more safe.
		// TODO Auto-generated method stub
		try
		{
		String name = request.getParameter("name");
		String gender = request.getParameter("gender");
		Date date = Date.valueOf(request.getParameter("date"));
		String address = request.getParameter("address");
		int bloodtype = Integer.parseInt(request.getParameter("bloodtype"));
		String contactno = request.getParameter("contactno");


		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/bloodbank"; //MySQL URL and followed by the database name
 		String username = "bbmsuser"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con); //for debugging purposes
 		//PreparedStatement st1 = con.prepareStatement("select count(book_id) as countno from book where book_id = ?"); 
 		//st1.setInt(1, id);
 		//ResultSet rs = st1.executeQuery();
 		//int count = -1;
 		//while(rs.next()) {
 			//count = rs.getInt("countno");
 		//}
 		
 		//if(count == 0) 
 		//{
		
		PreparedStatement st = con.prepareStatement("insert into Recipient (name, gender, DOB, address, typeID, contactNo) values(?, ?, ?, ?, ?, ?)");
 		st.setString(1,name);
		st.setString(2,gender);
		st.setDate(3,date);
		st.setString(4,address);
		st.setInt(5,bloodtype);
		st.setString(6,contactno);
		int result=st.executeUpdate();
		
		if(result>0)
		{
			
			RequestDispatcher rd = request.getRequestDispatcher("AddResult.jsp");
			rd.forward(request, response);
		}
		
 		//}
 		
 		else
 		{
			RequestDispatcher rd = request.getRequestDispatcher("InvalidAddition.jsp");
			rd.forward(request, response);
		}
 			

		//Checks if insert is successful.If yes,then redirects to Result.jsp page 
		

		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

		
	}

}