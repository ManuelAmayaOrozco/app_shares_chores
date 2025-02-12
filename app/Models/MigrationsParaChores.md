## ESPECIFICACIONES PARA CHORES

### Nombre del modelo y explicación del mismo

En términos generales, un Chore representa una tarea o quehacer en un sistema, como un registro de actividades domésticas, tareas de mantenimiento o asignaciones dentro de un equipo. Este modelo puede utilizarse para gestionar tareas recurrentes o asignadas a diferentes usuarios.
El nombre del modelo es -> "Chore"

### Nombre de la tabla y campos de la misma
Los campos que debéis incluir en la tabla son los siguientes:
| Campo            | Tipo de Dato          | Descripción |
|-----------------|----------------------|-------------|
| `id`            | `bigint` (PK)        | Identificador único de la tarea. |
| `name`          | `string`             | Nombre o título de la tarea. |
| `description`   | `text` (nullable)    | Descripción detallada de la tarea. Puede estar vacío. |
| `status`        | `enum` ó `string`               | Estado de la tarea (`pending`, `completed`). |
| `assigned_to`   | `bigint` (nullable)  | ID del usuario asignado a la tarea (relación con `users`). |
| `due_date`      | `datetime` (nullable) | Fecha límite para completar la tarea. |
| `created_at`    | `timestamp`          | Fecha de creación del registro. |
| `updated_at`    | `timestamp`          | Última actualización del registro. |