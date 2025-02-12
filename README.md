## DATOS MOCK PARA CHORES
```sql
INSERT INTO chores (name, description, status, assigned_to, due_date, created_at, updated_at)
VALUES
('Lavar los platos', 'Lavar los platos después de la cena', 'pending', 1, '2025-02-15 18:00:00', NOW(), NOW()),
('Sacar la basura', 'Sacar la basura de la cocina', 'completed', 2, '2025-02-14 20:00:00', NOW(), NOW()),
('Limpiar la sala', 'Pasar la aspiradora y limpiar el polvo', 'pending', 3, '2025-02-16 15:00:00', NOW(), NOW()),
('Regar las plantas', 'Regar las plantas del jardín', 'completed', 1, '2025-02-13 09:00:00', NOW(), NOW()),
('Cocinar la cena', 'Preparar la cena para la familia', 'pending', NULL, '2025-02-15 19:30:00', NOW(), NOW()),
('Lavar la ropa', 'Lavar y tender la ropa de la semana', 'completed', 2, '2025-02-12 10:00:00', NOW(), NOW()),
('Ordenar el garaje', 'Reorganizar herramientas y cajas en el garaje', 'pending', NULL, '2025-02-20 14:00:00', NOW(), NOW()),
('Barrer la entrada', 'Barrer la entrada de la casa', 'completed', 3, '2025-02-11 08:00:00', NOW(), NOW()),
('Hacer las compras', 'Comprar víveres y productos esenciales', 'pending', 1, '2025-02-17 12:00:00', NOW(), NOW()),
('Limpieza del baño', 'Limpiar el lavabo, inodoro y ducha', 'completed', 2, '2025-02-10 16:00:00', NOW(), NOW());
```


## SI SE QUIERE USAR EL SEEDER (YA CREADO)
```bash
php artisan migrate:fresh --seed
```
