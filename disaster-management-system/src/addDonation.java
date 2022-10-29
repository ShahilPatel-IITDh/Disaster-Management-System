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
@WebServlet("/addDonation")
public class addDonation extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public addDonation() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try
		{
	
		//getting input values from jsp page
			int donorID =Integer.parseInt(request.getParameter("id"));
			Date date = Date.valueOf(request.getParameter("date"));
			
		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/bloodbank"; //MySQL URL and followed by the database name
 		String username = "bbmsuser"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
 		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con);
 		PreparedStatement st1 = con.prepareStatement("select typeID from `Donor` where donorID = ?");
 		st1.setInt(1, donorID);
 		ResultSet rs = st1.executeQuery();
 		
 		int typeID = -1;
 		int count = 0;
 		while(rs.next()) {
 			typeID = rs.getInt("typeID");
 			count += 1;
 		}
 		System.out.println(typeID);
 		if(count == 0) {
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("addDonationResult.jsp");
 			rd.forward(request, response);
 		}
 		
 		PreparedStatement st2 = con.prepareStatement("INSERT INTO `BloodStock`(`dateDonated`, `typeID`, `donorID`, `isRecieved`) VALUES (?,?,?,?)");
 		st2.setDate(1, date);
 		st2.setInt(2, typeID);
 		st2.setInt(3, donorID);
 		st2.setInt(4, 0);
 		
 		int updateResult = st2.executeUpdate();
 		if(updateResult > 0) {
 			String result = "Success";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("addDonationResult.jsp");
 			rd.forward(request, response);
 		}
 		else {
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("addDonationResult.jsp");
 			rd.forward(request, response);
 		}
 		
		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 			String result = "Fail";
 			request.setAttribute("result", result);
 			RequestDispatcher rd = request.getRequestDispatcher("addDonationResult.jsp");
 			rd.forward(request, response);
 		}

		
	}

}