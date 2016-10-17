class QuestionController < ApplicationController
  def index
    @question = Question.first
  end
end
