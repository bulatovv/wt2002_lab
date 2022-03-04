JPEGS := $(wildcard *.jpg)
WEBPS := $(JPEGS:.jpg=.webp)
SVGS := $(wildcard *.svg)
TARGETS := $(addprefix out/, index.html style.css $(SVGS) $(WEBPS))

out/index.html: index.html
	minify $< | sed 's/\(src=.*\).jpg>/\1.webp>/' > out/index.html

out/style.css: style.scss
	sassc $< | minify --type css > out/style.css

out/%.svg: %.svg
	minify $< > $@

out/%.webp: %.jpg
	convert $< -quality 50 $@

.PHONY: all checksize

checksize:
	@echo "Original size: "; du -hs --exclude=out --exclude=Makefile 
	@echo "Minified size"; du -hs out

all: $(TARGETS) checksize
