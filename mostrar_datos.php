        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #545761ff;
            --secondary: #f7170fff;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --danger: #e63946;
            --warning: #f4a261;
            --gray: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #353a41ff 100%);
            color: var(--dark);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .logo {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--gray);
            font-size: 1.1rem;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--box-shadow);
            text-align: center;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .card h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .card p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .card.success {
            border-top: 4px solid var(--success);
        }

        .card.warning {
            border-top: 4px solid var(--warning);
        }

        .card.danger {
            border-top: 4px solid var(--danger);
        }

        .table-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .table-header {
            padding: 20px;
            background: var(--primary);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            font-weight: 600;
            font-size: 1.4rem;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .search-box {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
        }

        .search-box input {
            background: transparent;
            border: none;
            color: white;
            outline: none;
            width: 200px;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .btn-success {
            background: #2ecc71;
            color: white;
        }

        .btn-success:hover {
            background: #27ae60;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f1f5fd;
        }

        th {
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 1px solid #e1e5eb;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid #e1e5eb;
            transition: var(--transition);
        }

        tbody tr:hover td {
            background-color: #f8fafd;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status.active {
            background: #e7f7ef;
            color: #2ecc71;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .error-message {
            background: #ffe6e6;
            color: var(--danger);
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            border-left: 4px solid var(--danger);
        }

        .success-message {
            background: #e6f7e6;
            color: #2e7d32;
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            border-left: 4px solid #2e7d32;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #e1e5eb;
        }

        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .table-header {
                flex-direction: column;
                gap: 15px;
            }
            
            .header-actions {
                flex-direction: column;
                width: 100%;
            }
            
            .search-box {
                width: 100%;
            }
            
            .search-box input {
                width: 100%;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-database"></i>
            </div>
            <h1>Sistema de Gestión de Usuarios de PahecoBox</h1>
            <p class="subtitle">Visualización y administración de datos de usuarios</p>
        </header>

        <?php
        // Configuración de la conexión a la base de datos
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $basedatos = "mi_base_datos";

        // Procesar formulario de agregar usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar_usuario'])) {
            try {
                $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
                
                if ($conexion->connect_error) {
                    throw new Exception("Error de conexión: " . $conexion->connect_error);
                }
                
                // Obtener y limpiar datos del formulario
                $nombre = trim($_POST['nombre']);
                $email = trim($_POST['email']);
                $fecha_registro = date('Y-m-d'); // Fecha actual
                
                // Validar datos
                if (empty($nombre) || empty($email)) {
                    throw new Exception("Todos los campos son obligatorios");
                }
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("El formato del email no es válido");
                }
                
                // Insertar nuevo usuario
                $sql = "INSERT INTO usuarios (nombre, email, fecha_registro) VALUES (?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("sss", $nombre, $email, $fecha_registro);
                
                if ($stmt->execute()) {
                    echo '<div class="success-message">';
                    echo '<i class="fas fa-check-circle"></i> Usuario agregado correctamente';
                    echo '</div>';
                } else {
                    throw new Exception("Error al agregar usuario: " . $stmt->error);
                }
                
                $stmt->close();
                $conexion->close();
                
            } catch (Exception $e) {
                echo '<div class="error-message">';
                echo '<i class="fas fa-exclamation-triangle"></i> ' . $e->getMessage();
                echo '</div>';
            }
        }

        try {
            // Crear conexión para mostrar datos
            $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
            
            // Verificar conexión
            if ($conexion->connect_error) {
                throw new Exception("Error de conexión: " . $conexion->connect_error);
            }
            
            // Consulta SQL para obtener los datos
            $sql = "SELECT id, nombre, email, fecha_registro FROM usuarios ORDER BY fecha_registro DESC";
            $resultado = $conexion->query($sql);
            
            // Obtener estadísticas
            $total_usuarios = $resultado->num_rows;
            
            // Calcular usuarios del último mes
            $fecha_limite = date('Y-m-d', strtotime('-1 month'));
            $sql_recientes = "SELECT COUNT(*) as total FROM usuarios WHERE fecha_registro >= '$fecha_limite'";
            $result_recientes = $conexion->query($sql_recientes);
            $fila_recientes = $result_recientes->fetch_assoc();
            $usuarios_recientes = $fila_recientes['total'];
            
            // Calcular usuarios antiguos
            $sql_antiguos = "SELECT COUNT(*) as total FROM usuarios WHERE fecha_registro < '$fecha_limite'";
            $result_antiguos = $conexion->query($sql_antiguos);
            $fila_antiguos = $result_antiguos->fetch_assoc();
            $usuarios_antiguos = $fila_antiguos['total'];
            
            echo '<div class="dashboard">';
            echo '<div class="card success">';
            echo '<i class="fas fa-users"></i>';
            echo '<h3>' . $total_usuarios . '</h3>';
            echo '<p>Total de Usuarios</p>';
            echo '</div>';
            
            echo '<div class="card warning">';
            echo '<i class="fas fa-user-plus"></i>';
            echo '<h3>' . $usuarios_recientes . '</h3>';
            echo '<p>Usuarios Recientes</p>';
            echo '</div>';
            
            echo '<div class="card danger">';
            echo '<i class="fas fa-user-clock"></i>';
            echo '<h3>' . $usuarios_antiguos . '</h3>';
            echo '<p>Usuarios Antiguos</p>';
            echo '</div>';
            echo '</div>';
            
            if ($resultado->num_rows > 0) {
                echo '<div class="table-container">';
                echo '<div class="table-header">';
                echo '<h2><i class="fas fa-list"></i> Lista de Usuarios</h2>';
                echo '<div class="header-actions">';
                echo '<div class="search-box">';
                echo '<i class="fas fa-search"></i>';
                echo '<input type="text" placeholder="Buscar usuario..." id="searchInput">';
                echo '</div>';
                echo '<button class="btn btn-success" onclick="abrirModal()">';
                echo '<i class="fas fa-plus"></i> Agregar Usuario';
                echo '</button>';
                echo '</div>';
                echo '</div>';
                
                echo '<table id="usersTable">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Usuario</th>';
                echo '<th>Email</th>';
                echo '<th>Fecha de Registro</th>';
                echo '<th>Estado</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                // Mostrar cada fila de datos
                while($fila = $resultado->fetch_assoc()) {
                    $inicial = substr($fila["nombre"], 0, 1);
                    $fecha_formateada = date("d/m/Y", strtotime($fila["fecha_registro"]));
                    
                    // Determinar si es usuario reciente
                    $es_reciente = (strtotime($fila["fecha_registro"]) >= strtotime('-1 month'));
                    $estado = $es_reciente ? '<span class="status active">Activo</span>' : '<span class="status">Inactivo</span>';
                    
                    echo '<tr>';
                    echo '<td>';
                    echo '<div class="user-info">';
                    echo '<div class="user-avatar">' . $inicial . '</div>';
                    echo '<div>' . htmlspecialchars($fila["nombre"]) . '</div>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td>' . htmlspecialchars($fila["email"]) . '</td>';
                    echo '<td>' . $fecha_formateada . '</td>';
                    echo '<td>' . $estado . '</td>';
                    echo '<td>';
                    echo '<div class="actions">';
                    echo '<button class="btn btn-primary" onclick="editarUsuario(' . $fila["id"] . ')"><i class="fas fa-edit"></i> Editar</button>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                
                echo '<div class="footer">';
                echo '<p>Mostrando ' . $resultado->num_rows . ' usuarios registrados en el sistema</p>';
                echo '</div>';
            } else {
                echo '<div class="empty-state">';
                echo '<i class="fas fa-user-slash"></i>';
                echo '<h3>No se encontraron usuarios</h3>';
                echo '<p>No hay usuarios registrados en la base de datos.</p>';
                echo '<button class="btn btn-success" onclick="abrirModal()">';
                echo '<i class="fas fa-plus"></i> Agregar Primer Usuario';
                echo '</button>';
                echo '</div>';
            }
            
            // Cerrar conexión
            $conexion->close();
            
        } catch (Exception $e) {
            echo '<div class="error-message">';
            echo '<h3><i class="fas fa-exclamation-triangle"></i> Error de conexión</h3>';
            echo '<p>' . $e->getMessage() . '</p>';
            echo '<p>Verifica que la base de datos y tabla existan.</p>';
            echo '</div>';
        }
        ?>
        
        <!-- Modal para agregar usuario -->
        <div id="modalAgregar" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><i class="fas fa-user-plus"></i> Agregar Nuevo Usuario</h3>
                    <button class="close" onclick="cerrarModal()">&times;</button>
                </div>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required 
                               placeholder="Ej: Juan Pérez">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required 
                               placeholder="Ej: juan@email.com">
                    </div>
                    <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                        <button type="button" class="btn btn-outline" onclick="cerrarModal()">Cancelar</button>
                        <button type="submit" name="agregar_usuario" class="btn btn-success">
                            <i class="fas fa-save"></i> Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="footer">
            <p>Sistema desarrollado con PHP y MySQL | <a href="http://localhost/phpmyadmin" target="_blank">Abrir phpMyAdmin</a></p>
        </div>
    </div>

    <script>
        // Funcionalidad de búsqueda
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#usersTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });

        // Funciones para el modal
        function abrirModal() {
            document.getElementById('modalAgregar').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modalAgregar').style.display = 'none';
        }

        // Cerrar modal al hacer clic fuera del contenido
        window.onclick = function(event) {
            const modal = document.getElementById('modalAgregar');
            if (event.target === modal) {
                cerrarModal();
            }
        }

        // Funciones para ver y editar (placeholder)
        

        function editarUsuario(id) {
            alert('Editar usuario ID: ' + id + '\nProfe esta funcionalidad está en desarrollo :).');
        }
        
        // Efecto de carga inicial
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>