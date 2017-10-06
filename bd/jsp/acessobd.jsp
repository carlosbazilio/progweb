<%@ page import="java.sql.*" %>
<%@ page import="org.postgresql.*" %>

<!-- Configuração com DataSource: https://jdbc.postgresql.org/documentation/head/datasource.html -->

<html>
    <head>
        <title>Basicao JSP</title>
    </head>
    <body>
        <h1>Um exemplo basico</h1>
        <% 
        try {
            Class.forName("org.postgresql.Driver");
            Connection con = DriverManager.getConnection("jdbc:postgresql://localhost:5432/postgres",
                                              "postgres",
                                              "postgresadmin");
            Statement stmt = con.createStatement();
            
            ResultSet rs = stmt.executeQuery("select * from company;");
            while (rs.next()) {
                out.print("Id: " + rs.getInt("id"));
                out.print(" Nome: " + rs.getString("name"));
                out.println(" Endereco: " + rs.getString("address"));
            }
        } catch (ClassNotFoundException e) {
            out.println("A classe do driver de conexao nao foi encontrada!");
        } catch (SQLException e) {
            out.println("Algum erro na conexao com o banco ocorreu!");
        } 
        %>
    </body>
</html>
