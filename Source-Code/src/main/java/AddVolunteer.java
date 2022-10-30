


import java.io.IOException;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

/**
 * Servlet implementation class StudentServlet
 */
@WebServlet("/AddVolunteer")
public class AddVolunteer extends HttpServlet {
	private static final long serialVersionid = 1L;
   
    public AddVolunteer() {
        super();
        // TODO Auto-generated constructor stub
    }
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try
		{
	
		//getting input values from jsp page
		int Id = Integer.parseInt(request.getParameter("Id"));
		String Name = request.getParameter("Name");
		int Age = Integer.parseInt(request.getParameter("Age"));
		String Gender = request.getParameter("Gender");
		String Area = request.getParameter("Area");
		String Contact = request.getParameter("Contact");


		Connection con = null;
 		String url = "jdbc:mysql://localhost:3306/Resources"; //MySQL URL and followed by the database name
 		String username = "Disaster"; //MySQL username
 		String password = "Pass@123"; //MySQL password
		
		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection(url, username, password); //attempting to connect to MySQL database
 		System.out.println("Printing connection object "+con);

		//Prepared Statement to add student data
		PreparedStatement st = con.prepareStatement("insert into volunteer values(?,?,?,?,?,?)");
 		st.setInt(1,Id);
		st.setString(2,Name);
		st.setInt(3,Age);
		st.setString(4,Gender);
		st.setString(5,Contact);
		st.setString(6,Area);
		int result=st.executeUpdate();

		//Checks if insert is successful.If yes,then redirects to Result.jsp page 
		if(result>0)
		{
			
			RequestDispatcher rd = request.getRequestDispatcher("AddVolunteerResult.jsp");
			rd.forward(request, response);
		}

		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

	
	}


}

