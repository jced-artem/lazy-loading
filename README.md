# lazy-loading
Quick simple lazy loading trait using reference property and closure

You do not need anymore to write something similar to implement lazy loading:
```
class ObjectFactory
{
    private $object;
    
    public function getObject()
    {
        if (empty($object)) {
            $this->object = new stdClass();
        }
        return $this->object;
    }
}
```
And, actually, you also do not need to keep in mind where you need to use `empty()`, `is_null()` or `$x === false`!

Just use LazyTrait:
```
class ObjectFactory
{
    use \Jced\LazyTrait;
    
    private $object1;
    private $object2;
    private $object3;
    private $object4;
    private $object5;
    
    public function getObject1()
    {
        // assert empty by default
        return $this->lazy($this->object1, new stdClass());
    }
    
    public function getObject2()
    {
        // assert empty by default
        return $this->lazy($this->object2, function() {
            return new stdClass();
        });
    }
    
    public function getObject3()
    {
        // assert is_null
        return $this->lazy($this->object3, new stdClass(), false, true);
    }
    
    public function getObject4()
    {
        // assert is false
        return $this->lazy($this->object4, new stdClass(), false, false, true);
    }
    
    public function getObject5()
    {
        // assert is false or empty or is_null
        return $this->lazy($this->object5, new stdClass(), true, true, true);
    }
}
```
### Install
`composer require jced-artem/lazy-loading`

### Notice
Note that if you pass object as 'return' param - you will get reference.
Use `new` or `clone` to prevent it if you need.
