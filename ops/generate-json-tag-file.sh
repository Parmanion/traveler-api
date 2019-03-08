#!/bin/bash
# Script for generate json file with 3 latest git tags and last update of master
# The json file generated is used in index.html for listing VC API Specification versions

latestTag=$(git tag --sort=version:refname | tail -3)

outputDocsDir=$1
if [ -z "$outputDocsDir" ]
then
    echo "Missing output docs dir"
    exit 2
fi

function generateJsonResults
{
    jsonRender="["

    for tag in $latestTag; do
            jsonRender=$jsonRender'{'
            jsonRender=$jsonRender'"name":"'$tag'",'
            jsonRender=$jsonRender'"url":"'/specification-tag-history/specification-$tag.yml'"'
            jsonRender=$jsonRender'}'
            jsonRender=$jsonRender','
    done

    jsonRender=$jsonRender'{'
    jsonRender=$jsonRender'"name":"'LATEST'",'
    jsonRender=$jsonRender'"url":"'/specification-tag-history/specification-latest.yml'"'
    jsonRender=$jsonRender'}'

    jsonRender=$jsonRender"]"
      echo $jsonRender 2>&1 | tee $outputDocsDir/version.json
}
for tag in $latestTag; do
  cp ./open-api-specifications/specification-$tag.yml ./$outputDocsDir/specification-tag-history/
done
cp ./open-api-specifications/specification-latest.yml ./$outputDocsDir/specification-tag-history/
cp ./open-api-specifications/specification-latest.yml ./$outputDocsDir/specification.yml

generateJsonResults

