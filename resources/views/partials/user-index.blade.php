@vite('resources/css/user_styles/user-index_styles.css')
<main class="main__user-index">
    <p>Hola usuario, esta es tu página principal. En esta página principal aparecerán los siguientes datos:</p>
    <p>Una lista de tareas asignadas, tanto las tareas realizadas como las pendientes con dos botones al lado de cada tarea,<br>
        uno para marcar la tarea como realizada y otro para eliminar la tarea
    </p>
    <p>Los botones que pongo aquí son sólo un ejemplo visual de cómo se podría ver, pero el diseño es libre</p>
    <ul>
        <li>TAREA 1
            <div style="display: inline; margin-left:1em;">
                <button type="button" class="btn btn-success">Hecha</button>
                <button type="button" class="btn btn-danger">Borrar</button>
            </div>
        </li>
        <li>TAREA 2<div style="display: inline; margin-left:1em;">
                <button type="button" class="btn btn-success">Hecha</button>
                <button type="button" class="btn btn-danger">Borrar</button>
            </div>
        </li>
        <li>TAREA 3<div style="display: inline; margin-left:1em;">
                <button type="button" class="btn btn-success">Hecha</button>
                <button type="button" class="btn btn-danger">Borrar</button>
            </div>
        </li>
        <li>TAREA 4<div style="display: inline; margin-left:1em;">
                <button type="button" class="btn btn-success">Hecha</button>
                <button type="button" class="btn btn-danger">Borrar</button>
            </div>
        </li>
        <li>TAREA 5<div style="display: inline; margin-left:1em;">
                <button type="button" class="btn btn-success">Hecha</button>
                <button type="button" class="btn btn-danger">Borrar</button>
            </div>
        </li>
    </ul>
</main>