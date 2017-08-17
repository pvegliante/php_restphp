<?php

  class Category {
    private $conn;
    private $table_name = 'categories';

    public $id;
    public $name;
    public $description;
    public $created;
    public $modified;

    public function __construct($db) {
      $this->conn = $db;
    }

    public function create() {
      try{
        $query = 'INSTER INTO categories
                  SET id=:id, name=:name, description=:description,
                  created=:created, modified=:modified';

              $stmt = $this->conn->prepare($query);

              $id = htmlspecialchars(strip_tags($this->id));
              $name = htmlspecialchars(strip_tags($this->name));
              $description = htmlspecialchars(strip_tags($this->description));
              $created = htmlspecialchars(strip_tags($this->created));
              $modified = htmlspecialchars(strip_tags($this->modified));

              $stmt->bindParam(':id', $id);
              $stmt->bindParam(':name', $name);
              $stmt->bindParam(':description', $description);
              $stmt->bindParam(':created', $created);
              $stmt->bindParam(':modified', $modified);

              $create = date('Y-m-d H:i:s');
              $stmt->bindParam(':created', $create);

              if($stmt->execute()) {
                return true;
              } else {
                return false;
              }
      }
      catch(PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
      }
    }

    public function readAll() {
      $query = 'SELECT c.id, c.name, c.description, c.created, c.modified as category_name
                FROM  . $this->table_name ';

      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return json)encode($results);
    }

    public function readOne() {
      $qurey = 'SELECT c.id, c.name, c.description, c.created, c.modified as category_id
                FROM . $this->table_name';

        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam('id:', $id);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encoded($results);
    }
      public function update() {
        $query = 'UPDATE categories
                  SET id=:id, name=:name, description=:description
                      created=:created, modified=:modified
                      WHERE id=:id';

          $stmt = $this->conn->prepare($query);

          $id = htmlspecialchars(strip_tags($this->id));
          $name = htmlspecialchars(strip_tags($this->name));
          $description = htmlspecialchars(strip_tags($this->description));
          $created = htmlspecialchars(strip_tags($this->created));
          $modified = htmlspecialchars(strip_tags($this->modified));

          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':description', $description);
          $stmt->bindParam(':created', $created);
          $stmt->bindParam(':modified', $modified);

          if($stmt->execute) {
            return true;
          } else {
            return false;
          }
      }

      public function delete($ins) {
        $query = 'DELETE FROM categories
                  WHERE id
                  IN (:ins)';
        $stmt = $this->conn->prepare($query);

        $ins = htmlspecialchars(strip_tags($ins));

        $stmt->bindParam(':ins', $ins);

        if($stmt->execute()) {
          return true;
        } else {
          return false;
        }
      }
  }
