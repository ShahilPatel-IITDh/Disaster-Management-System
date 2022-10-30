import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class LoginServlet
 */
@WebServlet("/loginServlet")
public class loginServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public loginServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {	//post method is being used as it is more safe.
		// TODO Auto-generated method stub
		try
		{
		String fusername = request.getParameter("username");
		String fpassword = request.getParameter("password");
		System.out.println(fusername + " " + fpassword );
		
		if((fusername.equals("admin"))&&(fpassword.equals("admin")))
		{
			response.sendRedirect("adminHome.jsp");
		}
		
 		
 		else
 		{
 			response.sendRedirect("Login.jsp");
			
		}
 			

		//Checks if insert is successful.If yes,then redirects to Result.jsp page 
		

		}
		 catch (Exception e) 
 		{
 			e.printStackTrace();
 		}

		
	}

}