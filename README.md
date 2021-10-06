# Business portfolio

This is a portfolio site I have created for a friend's business. It has seen multiple reworks and was initially written using Express and using a front-end framework called StencilJS, which is similar to class-based React. You may see the original version ![here](https://github.com/prothy/sativion).

We realized at deploy time that the shared hosting provider did not support Node.js and the lack of SSH access made any potential hacks all but impossible (there is apparently a way to work around such restrictions using PHP, but alas). I had therefore no other choice but to rewrite the site in PHP, which was made easier by my curiosity for PHP-based frameworks. I chose Symphony because it had a bunch of cool features, such as an easy way to build routes using YAML files, and a built-in localization system that simplified the JSON-based approach I attempted in the Node.js version of the site.
