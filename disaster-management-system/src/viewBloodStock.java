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
@WebServlet("/viewBloodStock")
public class viewBloodStock extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public viewBloodStock() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
				try
		{
	
		//getting input values from jsp page

		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/bloodbank"; //MySQL URL and followed by the database name
 		String username = "bbmsuser"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		//System.out.println("Printing connection object "+con);
 		
 		Statement stmt = con.createStatement();
 		ResultSet rs = stmt.executeQuery("select * from BloodStock natural join BloodType;");
 		//System.out.println("Printing connection object 2"+con);
 		ArrayList Rows = new ArrayList();
		while(rs.next())
		{	
			ArrayList row = new ArrayList();
			int ID = rs.getInt("id");
			int donorID = rs.getInt("donorID");
			Date date = rs.getDate("dateDonated");
			int isRecieved = rs.getInt("isRecieved");
			String typeName = rs.getString("typeName");
			
			row.add(ID);
			row.add(donorID);
			row.add(date);
			if(isRecieved == 1) {
				row.add("Yes");
			}
			else {
				row.add("No");
			}
			row.add(typeName);
			Rows.add(row);
			System.out.println(row);
		}
         con.close();  
       
        request.setAttribute("propertyList", Rows);
        if(!Rows.isEmpty()) {
        	RequestDispatcher rd = request.getRequestDispatcher("viewBloodStock.jsp");
			rd.forward(request, response);
        }

		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

		
	}

}