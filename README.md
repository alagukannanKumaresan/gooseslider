# gooseslider

It is a typo3 extension for responsive slider. 
You can just add this extension simply in your folder structure like this, typo3conf/ext/gooseslider.

And you have to just add the gooseslider plugin settings in your setup typoscript of your main template something like below.

##############################################################
## PLUGIN SETTINGS
##############################################################

```plugin.tx_gooseslider_pi1{
        img.file.width = 1920c //Image width in slider
        img.file.height = 348c //Image height in slider
        img.altText=my slider 
        img.titleText=my website
}
```
We are depending on http://responsiveslides.com/ and I am thanking them here for opensource js&css files. For more information regarding latest JS & CSS, just visit their website.

As we are depending on Responsive CSS & JS files, we have to add those files too in your typoscript or add it via composer(if you use composer).

##############################################################
## Include CSS & JS
##############################################################

```
  includeCSS {
    file_10 = typo3conf/ext/gooseslider/res/responsiveslides.css
  }
  
  includeJSFooter {
    responsiveslides = typo3conf/ext/gooseslider/res/responsiveslides.min.js
  }
```

Then simply use this one line typoscript to access the slider in page(which page slider need to shown/globally) typoscript like,

##############################################################
## ADD SLIDER PLUGIN 
##############################################################
```    slider < plugin.tx_gooseslider_pi1 ```

Also you can use various slider sizes based on page such as like,

```
   [globalVar = TSFE:id = (youpageid here)]
      slider.img.file.height = 348c //same width too
   [global]
```
Then access this variable 'slider' in your html fluid template like below,
```
   <div>
     <f:format.raw>{slider}</f:format.raw>
   </div>
```

Done. Feel free to write me.
