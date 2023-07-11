<?php
abstract class SimpleComponent {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    abstract public function getSize();
}

abstract class CompositeComponent extends SimpleComponent {
    private array $children = [];

    /**
     * @return SimpleComponent[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function add(SimpleComponent $component) {
        $this->children[] = $component;
    }

    public function remove(SimpleComponent $component) {
        $index = array_search($component, $this->children);
        if ($index !== false) {
            unset($this->children[$index]);
        }
    }

    public function getSize(): int
    {
        $totalSize = 0;
        foreach ($this->children as $child) {
            /** @var SimpleComponent $child */
            $totalSize += $child->getSize();
        }

        return $totalSize;
    }
}

class File extends SimpleComponent {
    private int $size;

    public function __construct($name, $size) {
        parent::__construct($name);
        $this->size = $size;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}

class Folder extends CompositeComponent {

}

$file1 = new File("file1.txt", 100);
$file2 = new File("file2.txt", 50);
$file3 = new File("file3.txt", 5);
$directory1 = new Folder("folder1");
$directory2 = new Folder("folder2");

$directory1->add($file1);
$directory1->add($file2);

$directory2->add($directory1);
$directory2->add($file3);

$totalSize = $directory2->getSize();
