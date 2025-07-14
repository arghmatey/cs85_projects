# Sewing Project Tracker

A simple MVC PHP app for tracking personal sewing projects.

## Setup

1. Clone this repo
2. Install dependencies
3. Run PHP development server

## AI-Generated Prompt and Critique

### Prompt:

> Write a PHP method for a class called SewingProject that calculates the cost based on the property $hoursSpent. The method should return the calculated result. If the value of $hoursSpent is 0 or invalid, return a fallback message.

```
public function getCostPerHour() {
    if ($this->hoursSpent <= 0 || $this->cost <= 0) {
        return "Invalid data.";
    }
    return round($this->cost / $this->hoursSpent, 2);
}
```

### Critique:

The method was well written, but utilized a property that I did not have defined in my code or ask it to use ($cost). To avoid this, I could have asked it to use a singular hard coded amount. I would need to implement that before adding it to my project to avoid errors. The use of round() does improve the readability of the result which I appreciate. If I were to use this in a production setting, I would expand validation to check data types or add more specific error handling.

## Reflection:

I chose to build a sewing project tracker becaue sewing is an activiy I enjoy regularly. I liked the idea of making a tracker in the previous assingment and would like to continue to expand on it as this class goes on. In the future, I would like to make the process of documenting and seeing visual representation of my projects easier.

The app loads SewingProject objects through a controller, then passes them to a view that formats and displays the details. Each project shows a summary and effort level based on how many hours it took. The core goal was to separate logic, data, and presentation while keeping everything lightweight and understandable.

The hardest part was getting autoloading to work with Composer. Troubleshooting path issues and validating that PHP recognized my class files took time. I also had to ensure that the structure of the folders matched what the autoloader expected under PSR-4. Once configured, autoloading dramatically improved the workflow.

This project helped me understand how important the MVC structure is for maintainability. Writing logic in the model kept the controller simple, and separating the view made everything easier to read. I also saw firsthand how Composer and autoloading eliminate repetitive require statements.
