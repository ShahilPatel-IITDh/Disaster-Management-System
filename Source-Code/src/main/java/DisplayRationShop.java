import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class AddServlet
 */
@WebServlet("/DisplayRationShop")
public class DisplayRationShop extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DisplayRationShop() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
				try
		{
	
		//getting input values from jsp page

		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/Resources"; //MySQL URL and followed by the database name
 		String username = "Disaster"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		//System.out.println("Printing connection object "+con);
 		
 		Statement stmt = con.createStatement();
 		ResultSet rs = stmt.executeQuery("select * from ration;");
 		//System.out.println("Printing connection object 2"+con);
 		ArrayList Rows = new ArrayList();
		while(rs.next())
		{	
			ArrayList row = new ArrayList();
			int Id = rs.getInt("id");
			String Name = rs.getString("Name");
			String Location = rs.getString("Location");
			
			row.add(Id);
			row.add(Name);
			row.add(Location);
			Rows.add(row);
			System.out.println(row);
		}
         con.close();  
       
        request.setAttribute("RationList", Rows);
        if(!Rows.isEmpty()) {
        	RequestDispatcher rd = request.getRequestDispatcher("DisplayRationShop.jsp");
			rd.forward(request, response);
        }

		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

		
	}

}