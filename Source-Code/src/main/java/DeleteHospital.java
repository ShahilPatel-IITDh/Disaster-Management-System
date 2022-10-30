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
@WebServlet("/DeleteHospital")
public class DeleteHospital extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DeleteHospital() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try
		{
	
		//getting input values from jsp page
			int Id =Integer.parseInt(request.getParameter("id"));
			System.out.println(Id);
			
		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/Resources"; //MySQL URL and followed by the database name
 		String username = "Disaster"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con);
 		PreparedStatement st1 = con.prepareStatement("delete from `hospital` where `Id` = ?");
 		st1.setInt(1, Id);
 		int rs = st1.executeUpdate();
 		RequestDispatcher rd = request.getRequestDispatcher("adminHome.jsp");
		rd.forward(request, response);
		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 			RequestDispatcher rd = request.getRequestDispatcher("adminHome.jsp");
 			rd.forward(request, response);
 		}

		
	}

}