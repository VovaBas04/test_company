<ul>Краткие ответы на поставленные задачи
    <li>Была создана одна таблица catalogs, которая содержит id, название title и поле catalog_id, которая ссылается на себя саму же связью один ко многим(catalog_id ссылется на id).</li>
    <li>Был создан контроллер TreeController по эндпоинту /api/catalogs/tree для решения задачи о дереве.</li>
   <li>Был создан контроллер ListController по эндпоинту /api/catalogs/list для решения задачи о плоском списке.</li>
    <li>Был создан ShowContoller по эндпоинту /api/catalogs/show для решения задачи о заданном выводе</li>
</ul>    
<pre>
  Пояснение к решению. 
Я видел 3 пути решения задачи:
  1) Написать сырой SQL запрос к базе данных, используя рекурсивный запрос. 
    Этот метод кажется оптимальным, так как во-первых за один запрос получаем всю необходимую информацию из базы данных,
    (что является самым оптимальным решением в плане ресурсов), а во-вторых вся логика будет лежать строго в этом запросе. 
    Однако ввиду того, что Eloquent не поддерживает рекурсивные запросы, то придется писать сырой SQL запрос, что не является хорошей практикой.
  2) Из базы данных извлечь просто все записи, а далее с помощью контроллера как то обработать и преобразовать этот массив данных. 
    Оптимально по обращению к базе данных( всего 1 самый простой запрос), однако очень сложная логика реализации в контроллере, поэтому от этого метода было рещено отказаться.
  3) Сделать в таблице поле catalog_id, которое будет связано связью один ко многим, и это поле будет ссылаться на таблицу саму себя. 
    Как итог получиться 2 запроса, однако логика контроллера кратно уменьшиться по сравнению с пунктом 2, а также мы сможем использовать возможности ORM. 
    Таким образом был реализован алгоритм
  
  Вся логика представлена в сервисах( получение записи в репозитории CatalogRepository).
  Списки были реализованы по приниципу ключ: сын, значение: родитель(в моей реализации название, но может быть и id).
  Дерево было реализовано через модифицированный BFS обход( обход в ширину).
  В качестве представления дерева можно было использовать реализацию как на плоском списке, так и на дереве. 
      Я выбрал на дереве, хотя мог и на списке 
  Для сервисов было написано получение данных через паттерн репозиторий , 
      который фактически прогружает все элементы списка, 
          и у каждого элемента списка список его родителей(фактически, дерево, у каждого элемента которого глубина 1).
  Для удобства был также написан CRUD контроллер для добавления 
      и отображения элементов дерева(логика не выносилась в сервисы, из-за простоты).
  Также не валидированы входные запросы, предпологаетя, 
      что пользователь добавляет элементы так, 
          что в дереве не возникает цикла, 
              а первый элемент будет иметь значение category_id - null(корень)
  P.S. Также предпологалось, что у нас SQL база данных(MySql). 
      Конечно, намного проще было бы использовать графовую  Nosql базу данных такую как neo4j , 
          которая бы решила проблему за нас, но ввиду ее редкого использования, выбор был остановлен на SQL базе данных.
</pre>
