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
@WebServlet("/AddServlet")
public class AddServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AddServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try
		{
	
		//getting input values from jsp page
		
			String name = request.getParameter("name");
			String gender = request.getParameter("gender");
			Date date = Date.valueOf(request.getParameter("date"));
			String address = request.getParameter("address");
			int bloodtype =Integer.parseInt(request.getParameter("bloodtype"));
			String contactno = request.getParameter("contactno");
			int diseases = Integer.parseInt(request.getParameter("diseases"));
			int isSmoker = Integer.parseInt(request.getParameter("isSmoker"));
		


		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/bloodbank"; //MySQL URL and followed by the database name
 		String username = "bbmsuser"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con);
 		//PreparedStatement st1 = con.prepareStatement("select count(student_id) as countno from student where student_id = ?");
 		//st1.setInt(1, studentid);
 		//ResultSet rs = st1.executeQuery();
 		//int count = -1;
 		//while(rs.next()) {
 		//	count = rs.getInt("countno");
 		//}
 		
 		//if(count == 1) 
 		//{
		//Prepared Statement to add student data
		PreparedStatement st = con.prepareStatement("insert into Donor (name, gender, DOB, address, isSmoker, majorDiseases, contactNo, typeID) values(?, ?, ?, ?, ?, ?, ?, ?)");
		st.setString(1,name);
		st.setString(2,gender);
		st.setDate(3,date);
		st.setString(4,address);
		st.setInt(5,isSmoker);
		st.setInt(6,diseases);
		st.setString(7,contactno);
		st.setInt(8,bloodtype);
		int result=st.executeUpdate();
		
		if(result>0)
		{
			
			RequestDispatcher rd = request.getRequestDispatcher("IssueResult.jsp");
			rd.forward(request, response);
		}
		
 		//}
 		
 		else
 		{
			RequestDispatcher rd = request.getRequestDispatcher("InvalidIssue.jsp");
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