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
@WebServlet("/DisplayRequests")
public class DisplayRequests extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DisplayRequests() {
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
 		ResultSet rs = stmt.executeQuery("select * from Recipient;");
 		//System.out.println("Printing connection object 2"+con);
 		ArrayList Rows = new ArrayList();
		while(rs.next())
		{	
			ArrayList row = new ArrayList();
			int recipientID = rs.getInt("recipientID");
			String name = rs.getString("name");
			String gender = rs.getString("gender");
			Date date = rs.getDate("DOB");
			String address = rs.getString("address");
			String contactNo = rs.getString("contactNo");
			int typeID = rs.getInt("typeID");
			String BloodType = null;
			switch(typeID)
			{
			case 1:
				BloodType = "O +ve";
				break;
			case 2:
				BloodType = "O -ve";
				break;
			case 3:
				BloodType = "A +ve";
				break;
			case 4:
				BloodType = "A -ve";
				break;
			case 5:
				BloodType = "B +ve";
				break;
			case 6:
				BloodType = "B -ve";
				break;
			case 7:
				BloodType = "AB +ve";
				break;
			case 8:
				BloodType = "AB -ve";
				break;
			default:
				BloodType = "O +ve";
				break;
			}
			row.add(recipientID);
			row.add(name);
			row.add(gender);
			row.add(date);
			row.add(address);
			row.add(contactNo);
			row.add(BloodType);
			Rows.add(row);
			System.out.println(row);
		}
         con.close();  
       
        request.setAttribute("propertyList", Rows);
        if(!Rows.isEmpty()) {
        	RequestDispatcher rd = request.getRequestDispatcher("recipientDisplay.jsp");
			rd.forward(request, response);
			System.out.println("Done till here");
        }
        System.out.println("Error");
		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

		
	}

}