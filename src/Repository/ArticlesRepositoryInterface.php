<?php

namespace App\Repository;

use App\Entity\Articles;

interface ArticlesRepositoryInterface 
{
    /*
     * @return Article[]
     */
    public function getAllArticle():array;
    
    /*
     * @return Article[]
     */
    public function getFiveArticleActive():array;
    
    /*
     * @return Article[]
     */
    public function getArticlesCategoryId( int $articleCatId):array;
    
    /*
     * @return Article
     */
    public function getOneArticle(int $articleId): object; 
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setCreateArticle(Article $article): object;
    
    /*
     * @param Article $article 
     * @return Article
     */
    public function setUpdateArticle(Article $article): object;
    
     /*
     * @param Article $article 
     * @return mixed
     */
    public function setDeleteArticle(Article $article);
    
}



