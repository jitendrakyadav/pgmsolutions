PHPUnit Test:

Note: Just remember one rule, for which class you are going to create PHPUnit test, that would be never mocked (i.e. neither the whole class nor any functin). But all other classes which are connected to it, would be mocked (by creating mock-object/stub of whole class or partially i.e. by creating mock-object for only some functions of those). 
The execution flow of class, for which we are going to create PHPUnit test, will work in same way as the original class. Only difference is here, whenever it requires outsider class-object, we would need to provide mock-object of same outsider class instead of original and whenever it needs data we would need to provide test data at ourselves, not from outside.

A. YouTube Videos
1. https://youtu.be/sxaVxf479yQ : All you need to know about Unit Tests and Magento 2
2. https://youtu.be/AkJuI6XXr30 : 3 PHPUnit Features You Should Use for Unit Tests in Magento 2
3. https://youtu.be/JAA7BkH82gY : Magento 2 API tests and how to write TESTS
PHPUnit Test Manual:
4. https://phpunit.de/manual/5.5/en/test-doubles.html#test-doubles.mock-objects
Example: For example files, please look into following repository for mentioned branch.
small-core-php-apps/magento2-php-unit-test-example-files
(repository/branch)
