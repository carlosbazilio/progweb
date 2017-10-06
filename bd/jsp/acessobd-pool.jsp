<%@ page import="java.sql.*" %>
<%@ page import="javax.sql.*" %>
<%@ page import="javax.naming.*" %>

<!-- Configuração com DataSource: https://jdbc.postgresql.org/documentation/head/datasource.html 
https://tomcat.apache.org/tomcat-7.0-doc/jndi-resources-howto.html#JDBC_Data_Sources -->

<html>
    <head>
        <title>Exemplo de Conexão com Banco em JSP usando DataSource</title>
    </head>
    <body>
        <% 
        try {
            /*Class.forName("org.postgresql.Driver");
            Connection con = DriverManager.getConnection("jdbc:postgresql://localhost:5432/postgres",
                                              "postgres",
                                              "postgresadmin");*/
            DataSource ds = null;
            Connection con = null;
            
            Context ctx = new InitialContext();
            Context envCtx = (Context) ctx.lookup("java:comp/env");
            ds = (DataSource)envCtx.lookup("jdbc/Postgres");

            if (ds != null) {
                out.println("Cheguei aqui !!!!");

                con = ds.getConnection();

                Statement stmt = con.createStatement();
                
                ResultSet rs = stmt.executeQuery("select * from company;");
                while (rs.next()) {
                    out.print("Id: " + rs.getInt("id"));
                    out.print(" Nome: " + rs.getString("name"));
                    out.println(" Endereco: " + rs.getString("address"));
                }
            }
            else
                out.println("Não conseguiu localizar o recurso no servidor!");
        } /*catch (ClassNotFoundException e) {
            out.println("A classe do driver de conexao nao foi encontrada!");
        } */catch (SQLException e) {
            out.println("Algum erro na conexao com o banco ocorreu!");
        } catch (NamingException e) {
            out.println("Algum erro ocorreu na busca pelo banco no servidor!");
        }
        %>
    </body>
</html>
