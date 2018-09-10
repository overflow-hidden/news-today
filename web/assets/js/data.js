const request = require('request');
const cheerio = require('cheerio');
const fs = require('fs');
const iconv = require('iconv-lite');
const async = require('async');
const mysql = require('mysql');
const filter = require('bloom-filter-x');


var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test',
});




function fetch_news() {
    let urls = [];
    request({
            url: 'http://news.zol.com.cn/',
            encoding: null,
        },
        (err, res, body) => {
            body = iconv.decode(body, 'gb2312');
            let $ = cheerio.load(body);
            $('.content-list li').slice(0,20).each((k, v) => {
                let t = $(v).find('.info-head a');
                let title = t.text();
                let dsc = $(v).find('p').contents().eq(0).text();
                let image = $(v).find('img').attr('.src');
                let url = $(v).find('.info-head a').attr('href');

                if (filter.add(url)) {
                    urls.push({
                        title:title,
                        dsc:dsc,
                        image:image,
                        url:url,

                    });
                }
            });

            async.eachLimit(urls,1,(v,next) =>{
                request(
                    {
                        url:v.url,
                        encoding:null
                    },(err,head,body) => {
                        body = iconv.decode(body,'gb2312')
                        let $ = cheerio.load(body);
                        let time = $('.article-post-time').text();
                        let data_insert = 'insert into news (cid,title,dsc,image,url,create_time,content) values (?,?,?,?,?,?,?)'
                        connection.query(data_insert,[1,v.title,v.dsc,v.image,v.url,time,''],(err,results,fildes) => {
                            if(err) throw err
                            console.log('载入完成')
                            next(null)
                        })
                    }
                )
            })
            }
        )
}

fetch_news();
setInterval(fetch_news,10000);